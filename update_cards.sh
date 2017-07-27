#!/bin/bash -e

### Setting default values.
# URL - the target to query for scraping cards out of
url="http://192.168.59.104/card"
# Stop - what message to search for that would signify we've asked for a non-existant card
stop="Whoops! You found an error."
# Sets - What sets (Opuses) of cards we want to retrieve.
sets=("1" "2" "3" "pr")
###

# Housekeeping
if [[ -f 'cards.sql' ]]; then
  rm 'cards.sql'
fi

# Purge all old Card table entries, thus replacing them with our new ones. Comment these lines out if you're looking to append, not replace
echo "delete from cards;" > cards.sql
echo "ALTER TABLE cards AUTO_INCREMENT = 1" >> cards.sql

# Header for our imminent dump of card data to stdout.
printf '%-30s%-20s%-20s%-20s%-30s%-20s%-20s%-20s%-20s\n' "NAME" "ELEMENT" "COST" "TYPE" "JOB" "CATEGORY" "POWER" "RARITY" "NUMBER"

for s in "${sets[@]}"; do
  # More housekeeping
  if [[ -f '.cache' ]]; then
    rm '.cache'
  fi

  touch .cache
  i="1"
  # "So long as we haven't seen the 'stop' trigger..."
  while [[ "$(grep "$stop" .cache)" == "" ]]; do
    curl "$url/$s-$i" 2>/dev/null > .cache
    # Display what cards we've found, and the information we parsed for each card. Allows for review prior to implementation.
    card_name="$(grep "<h4>" .cache | sed -e 's/.*<h4>//g' -e "s/&#039;/'/g")"
    card_elem="$(grep ".png\" /> (" .cache | sed -e 's/.*(//g' -e 's/).*//g')"
    card_type="$(grep -A 1 ">Type<" .cache | grep -v ">Type<" | sed -e 's/.*<td>//g' -e 's/<\/td>.*//g')"
    card_cost="$(grep -A 1 ">Cost<" .cache | grep -v ">Cost<" | sed -e 's/.*none;">//g' -e 's/<\/td>.*//g')"
    card_job="$(grep -A 1 ">Job<" .cache | grep -v ">Job<" | sed -e 's/.*<td>//g' -e 's/<\/td>.*//g' -e "s/&#039;/'/g")"
    card_cat="$(grep -A 1 ">Category<" .cache | grep -v ">Category<" | sed -e 's/.*<td>//g' -e 's/<\/td>.*//g')"
    card_pwr="$(grep -A 1 ">Power<" .cache | grep -v ">Power<" | sed -e 's/.*<td>//g' -e 's/<\/td>.*//g')"
    card_num="$(grep -A 1 ">Card Number<" .cache | grep -v ">Card Number<" | sed -e 's/.*<td>//g' -e 's/<\/td>.*//g')"
    card_rare="$(echo $card_num | sed -e 's/.*-//g')"
    card_text="$(grep -A 1 ">Card Text<" .cache | grep -v ">Card Text<" | sed -e 's/.*<td><p>//g' -e 's/<\/p><\/td>.*//g' -e "s/&#039;/'/g")"
    printf '%-30s%-20s%-20s%-20s%-30s%-20s%-20s%-20s%-20s\n' "$card_name" "$card_elem" "$card_cost" "$card_type" "$card_job" "$card_cat" "$card_pwr" "$card_rare" "$card_num"

    # The database wants an integer for card_power, so ensure it gets one.
    if [[ "$card_cost" == "" ]]; then
      card_cost="0"
    fi

    # Replace tags with markup in text we pulled to keep things clean
    card_text="$(echo "$card_text" | sed -e 's|<img class="small-icon" src="/img/icons/special.png" />|[s]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/dull.png" />|[dull]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/fire.png" />|[fire]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/ice.png" />|[ice]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/air.png" />|[air]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/earth.png" />|[earth]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/lightning.png" />|[lightning]|g' \
                                         -e 's|<img class="small-icon" src="/img/icons/water.png" />|[water]|g' \
                                         -e 's|<span class="fa-stack fa-1x"><i class="fa fa-circle-thin fa-stack-1x"></i><span class="fa-stack-1x">1</span></span>|[1]|g' \
                                         -e 's|<span class="fa-stack fa-1x"><i class="fa fa-circle-thin fa-stack-1x"></i><span class="fa-stack-1x">2</span></span>|[2]|g' \
                                         -e 's|<span class="fa-stack fa-1x"><i class="fa fa-circle-thin fa-stack-1x"></i><span class="fa-stack-1x">3</span></span>|[3]|g' \
                                         -e 's|<b>||g' \
                                         -e 's|</b>||g')"

    # Make sure we don't mistake an error page for a card when making database entries
    if [[ "$(grep "$stop" .cache)" == "" ]]; then
      if echo "$card_type" | grep -qi "forward"; then
        # This is a conditional insert - it will only insert the card if one with the same set number and card number is not found in the database.
        printf "INSERT INTO cards ( set_number, name, cost, element, type, job, category, text, card_number, rarity, power, created_at, updated_at ) select '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', NOW(), NOW() from DUAL where not exists ( select id from cards where card_number = '%s' and set_number = '%s' limit 1 );\n" "$s" "$(echo $card_name | sed -e "s/'/\\\'/g")" "$card_cost" "$(echo "$card_elem" | awk '{print tolower($0)}')" "$(echo "$card_type" | awk '{print tolower($0)}')" "$(echo $card_job | sed -e "s/'/\\\'/g")" "$card_cat" "$(echo $card_text | sed -e "s/'/\\\'/g")" "$(printf "%03d", "$i")" "$card_rare" "$card_pwr" "$(printf "%03d", "$i")" "$s" >> cards.sql
      else
        # If the card we retrieved is not a forward, omit the 'power' value. Otherwise SQL will complain we aren't providing an integer.
        printf "INSERT INTO cards ( set_number, name, cost, element, type, job, category, text, card_number, rarity, created_at, updated_at ) select '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', NOW(), NOW() from DUAL where not exists ( select id from cards where card_number = '%s' and set_number = '%s' limit 1 );\n" "$s" "$(echo $card_name | sed -e "s/'/\\\'/g")" "$card_cost" "$(echo "$card_elem" | awk '{print tolower($0)}')" "$(echo "$card_type" | awk '{print tolower($0)}')" "$(echo $card_job | sed -e "s/'/\\\'/g")" "$card_cat" "$(echo $card_text | sed -e "s/'/\\\'/g")" "$(printf "%03d", "$i")" "$card_rare" "$(printf "%03d", "$i")" "$s" >> cards.sql
      fi
    fi

    i="$((i+1))"
  done
done

# more housekeeping
if [[ -f '.cache' ]]; then
  rm '.cache'
fi

exit 0
