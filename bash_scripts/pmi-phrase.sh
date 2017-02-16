#!/bin/bash

clear

arr=("af" "ak" "az" "bg" "ca" "eu" "fa" "ff" "hi_IN" "hu" "kn" "ku" "lg" "lt" "mr" "nb_NO" "or" "pa" "ro" "rw" "sv" "sw" "tr" "ur" "wa")

for lang in ${arr[@]}
do
	find $HOME/Desktop/terminology/$lang/ -type f | grep ".po" > $HOME/Desktop/Terminology_Creation/results/pootle/$lang.pootle
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pmi| sort -nrk 3 | sort -u -k1,1 | awk '$3 >=3.25' | awk {'print $1,$2'} | sed 's/ /;/g' | sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/pmi1-00
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pmi | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=3.0' | awk {'print $1,$2'} | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-75
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pmi| sort -nrk 3 | sort -u -k1,1 | awk '$3 >=2.75' | awk {'print $1,$2'} | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-50
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pmi | sort -nrk 3 | sort -u -k1,1 | awk '$3 >= 2.50' | awk {'print $1,$2'} | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-25
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pmi | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=2.25' | awk {'print $1,$2'} | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-00
done

for lang in ${arr[@]}
do
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-phrase| grep -e '^[a-z|A-Z]' | sort -u -t';' -k1,1 | sort -t';' -nrk 3| awk  -F';' '$3 >=0.80' | cut -d';' -f1 -f2 | sed 's/\\//g' > $HOME/Desktop/Terminology_Creation/results/$lang/phrase1-00
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-phrase | grep -e '^[a-z|A-Z]' | sort -u -t';' -k1,1 | sort -t';' -nrk 3| awk  -F';' '$3 >=0.75' | cut -d';' -f1 -f2| sed 's/\\//g' > $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-75
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-phrase| grep -e '^[a-z|A-Z]' | sort -u -t';' -k1,1 | sort -t';' -nrk 3| awk  -F';' '$3 >=0.70' | cut -d';' -f1 -f2 | sed 's/\\//g'> $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-50
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-phrase | grep -e '^[a-z|A-Z]' | sort -u -t';' -k1,1 | sort -t';' -nrk 3| awk  -F';' '$3 >=0.65' | cut -d';' -f1 -f2| sed 's/\\//g' > $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-25
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-phrase | grep -e '^[a-z|A-Z]' | sort -u -t';' -k1,1 | sort -t';' -nrk 3| awk  -F';' '$3 >=0.60' | cut -d';' -f1 -f2 | sed 's/\\//g'> $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-00
done