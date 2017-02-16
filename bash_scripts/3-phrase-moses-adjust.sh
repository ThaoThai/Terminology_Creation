arr=("ach" "af" "ak" "ar" "az" "bg" "bm" "bn_BD" "bs" "ca" "dsb" "es_MX" "eu" "fa" "ff" "fj" "ga-IE" "gn_BO" "gn_PY" "ha" "haw" "he" "hi_IN" "hr" "hsb" "ht" "hu" "hy_AM" "id" "ig" "is" "km" "kn" "ks" "ku" "lg" "lt" "lv" "mg" "ml" "mr" "ms" "my" "nb_NO" "ne" "ny" "or" "pa" "ps" "pt" "rn" "ro" "rw" "si" "sl" "sm" "sr" "ss" "su" "sv" "sw" "ta" "te" "tk" "tl" "tn" "tr" "ts" "tt" "ur" "uz" "vec" "vi" "wa" "wo" "xh" "yo" "zu")


for lang in ${arr[@]}
do
    echo $lang
	cat $HOME/Desktop/Terminology_Creation/results/$lang/train/model/lex.f2e | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=0.60' | awk {'print $1,$2'}  | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/moses0-60
done

for lang in ${arr[@]}
do
	cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-phrase | grep -e '^[a-z|A-Z]' | sort -u -t';' -k1,1 | sort -t';' -nrk 3| awk  -F';' '$3 >=0.60' | cut -d';' -f1 -f2 | sed 's/\\//g'> $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-60
done