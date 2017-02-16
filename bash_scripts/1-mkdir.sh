#!/bin/bash

clear

arr=("ach" "af" "ak" "ar" "az" "bg" "bm" "bn_BD" "bs" "ca" "dsb" "es_MX" "eu" "fa" "ff" "fj" "ga-IE" "gl" "gn_BO" "gn_PY" "ha" "haw" "he" "hi_IN" "hr" "hsb" "ht" "hu" "hy_AM" "id" "ig" "is" "km" "kn" "ks" "ku" "lg" "lt" "lv" "mg" "ml" "mr" "ms" "my" "nb_NO" "ne" "ny" "or" "pa" "ps" "pt" "rn" "ro" "rw" "scn" "si" "sl" "sm" "sr" "ss" "su" "sv" "sw" "ta" "te" "tk" "tl" "tn" "tr" "ts" "tt" "ur" "uz" "vec" "vi" "wa" "wo" "xh" "yo" "zu")

for lang in ${arr[@]}
do
	mkdir $HOME/Desktop/Terminology_Creation/results/$lang
	mkdir $HOME/Desktop/Terminology_Creation/results/$lang/working
	mkdir $HOME/Desktop/Terminology_Creation/results/$lang/lm
done

