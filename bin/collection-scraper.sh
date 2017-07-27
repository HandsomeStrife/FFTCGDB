#!/bin/bash -e

username=$1
source_url="http://fftcgdb.com"

if [[ -f .cache ]]; then
  rm .cache
fi
if [[ -f "${username}_collection.sql" ]]; then
  rm "${username}_collection.sql"
fi
if [[ -f .curl ]]; then
  rm .curl
fi

echo "$(curl "${source_url}/u/${username}" 2>/dev/null)" > .curl
echo "select id from users where username = '$username' limit 1;" > .cache

id="$(mysql -u root -D fftcgdb < .cache | awk '{printf $0};' | sed -e 's/id//g')"
cards=($(cat .curl | grep 'card-number' | sed -e "s|.*'>||g" -e "s|</div.*||g" | awk '{printf $0" "};'))
count=($(cat .curl | grep 'card-count' | sed -e "s|.*'>||g" -e "s|</div.*||g" | awk '{printf $0" "};'))
foil=($(cat .curl | grep 'foil-card' | sed -e "s|.*'>||g" -e "s|</div.*||g" | awk '{printf $0" "};'))

rm .cache
for c in "${cards[@]}"; do
  set="$(echo $c | cut -d '-' -f 1)"
  card="$(echo $c | cut -d '-' -f 2)"
  echo "select id from cards where set_number = '$set' and card_number = '$card';" >> .cache
done

sed -i -e "s/'0/'/g" -e "s/'0/'/g" .cache
echo "delete from collections where user_id = '$id';" > "${username}_collection.sql"

i=0;
coll=($(mysql -u root -D fftcgdb < .cache | awk '{printf $0" "};' | sed -e 's/id //g'))
for c in "${coll[@]}"; do
  echo "insert into collections (user_id, card_id, count, foil_count, created_at, updated_at) values ('$id', '${coll[$i]}', '${count[$i]}', '${foil[$i]}', NOW(), NOW());" >> "${username}_collection.sql"
  i=$((i+1))
done

#mysql -u root -D fftcgdb < "${username}_collection.sql"

rm .cache
rm .curl

exit 0
