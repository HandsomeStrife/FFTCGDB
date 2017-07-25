#!/bin/bash -e

url="http://fftcgdb.com/card"
stop="Whoops! You found an error."
sets=("2" "3" "pr")

if [[ -f 'cards.sql' ]]; then
  rm 'cards.sql'
fi

#echo "delete from cards;" > cards.sql
#echo "ALTER TABLE cards AUTO_INCREMENT = 1" >> cards.sql

printf '%-30s%-20s%-20s%-20s%-30s%-20s%-20s%-20s%-20s\n' "NAME" "ELEMENT" "COST" "TYPE" "JOB" "CATEGORY" "POWER" "RARITY" "NUMBER"
for s in "${sets[@]}"; do
  if [[ -f '.cache' ]]; then
    rm '.cache'
  fi

  echo "" > .cache
  i="1"
  while [[ "$(grep "$stop" .cache)" == "" ]]; do
    curl "$url/$s-$i" 2>/dev/null > .cache
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

    if [[ "$(grep "$stop" .cache)" == "" ]]; then
      printf "INSERT IGNORE INTO cards (set_number, name, cost, element, type, job, category, text, card_number, rarity, power, created_at) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', NOW());\n" "$s" "$(echo $card_name | sed -e "s/'/\\\'/g")" "$card_cost" "$(echo "$card_elem" | awk '{print tolower($0)}')" "$(echo "$card_type" | awk '{print tolower($0)}')" "$(echo $card_job | sed -e "s/'/\\\'/g")" "$card_cat" "$(echo $card_text | sed -e "s/'/\\\'/g")" "$i" "$card_rare" "$card_pwr" >> cards.sql
    fi

    i="$((i+1))"
  done
done

if [[ -f '.cache' ]]; then
  rm '.cache'
fi

exit 0
