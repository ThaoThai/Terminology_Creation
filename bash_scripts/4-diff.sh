#!/bin/bash


arr=("ach" "af" "ak" "ar" "az" "bg" "bm" "bn_BD" "bs" "ca" "dsb" "es_MX" "eu" "fa" "ff" "fj" "ga-IE" "gl" "gn_BO" "gn_PY" "ha" "haw" "he" "hi_IN" "hr" "hsb" "ht" "hu" "hy_AM" "id" "ig" "is" "km" "kn" "ks" "ku" "lg" "lt" "lv" "mg" "ml" "mr" "ms" "my" "nb_NO" "ne" "ny" "or" "pa" "ps" "pt" "rn" "ro" "rw" "scn" "si" "sl" "sm" "sr" "ss" "su" "sv" "sw" "ta" "te" "tk" "tl" "tn" "tr" "ts" "tt" "ur" "uz" "vec" "vi" "wa" "wo" "xh" "yo" "zu")

function different {
	awk -F';' 'NR==FNR{c[$1]++;next};c[$1] == 0' $1 $2 >> $1
    }

function compare  {
	cut -d';' -f1 $1 | sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/temp
	cut -d';' -f1 $2 | sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/temp_1
	grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/temp_1 $HOME/Desktop/Terminology_Creation/results/$lang/temp | sort -u 
}

for lang in ${arr[@]}
do
    different $HOME/Desktop/Terminology_Creation/results/$lang/$lang-output $HOME/Desktop/Terminology_Creation/results/$lang/moses0-60
    
	different $HOME/Desktop/Terminology_Creation/results/$lang/$lang-output $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-60
    
    sed 's/\\//g' $HOME/Desktop/Terminology_Creation/results/$lang/$lang-output | grep -e '^[a-z|A-Z]' | sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/$lang-final
    
	score=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/$lang-output | sort -u | wc -l)
	#echo "Same shared translation: $score"
	denom=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/$lang-output $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | sort -u | wc -l)
	#echo "Same english words: $denom"
	percent=$(echo "scale=2; $score*100/($denom+1)" | bc)
	echo "Percent of $lang is : $percent "

done
