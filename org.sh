#!/bin/bash

arr=("crn" "csb" "ctu" "cv" "cy" "dnj" "doi" "dsb" "dts" "dz" "en-ARRR" "en_GB" "en_ZA" "eo" "es_CL" "es_ES" "es_MX" "eu" "fa" "ff" "scn" "fj" "fo" "frp" "fur" "ga_IE" "gd" "gn_BO" "gn_PY" "got" "gu" "gv" "ha" "haw" "hch" "he" "hi_IN" "hr" "hsb" "ht" "hto" "hu" "hus" "hy_AM" "hz" "id" "ig" "ilo" "is" "ixl" "jbo" "jv" "ka" "kab" "kea" "kek" "kfy" "khw" "ki" "kk" "km" "kn" "kok" "krc" "ks" "ku" "kw" "ky" "la" "laj" "lb" "lg" "lgg" "lij" "lkt" "lmo" "lo" "lt" "lv" "mag" "mai" "mam" "mau" "meh" "mg" "mi" "min" "miq" "mis" "mit" "mix" "ml" "mn" "mni" "mos" "mqh" "mr" "ms" "mxp" "mxq" "mxt" "my" "nah" "nb_NO" "nch" "ncj" "nd" "ne" "neb" "ng" "nn_NO" "noa" "nqo" "nr" "nso" "nv" "ny" "nyn" "oc" "om" "or" "ote" "pa" "pai" "pbb" "pms" "prs" "ps" "pt" "pt_BR" "qno" "quy" "quz" "qvi" "rm" "rn" "ro" "rop" "rw" "sa" "sah" "sat" "sc" "sco" "sd" "sef" "sg" "shh" "shn" "si" "sl" "sm" "sn" "son" "sr" "ss" "st" "st_LS" "su" "sv" "sw" "szl" "ta" "ta_LK" "te" "tg" "th" "tk" "tl" "tn" "tob" "toj" "tr" "trc" "trs" "ts" "tso" "tsz" "tt" "tt_RU" "tzh" "tzo" "ug" "ur" "uz" "ve" "vec" "vi" "vmz" "wa" "wo" "xh" "xlo" "xog" "yaq" "yo" "yua" "yue-can" "zai" "zam" "zar" "zh_TW" "zty" "zu")
for lang in ${arr[@]}
do
	cat po_files.txt | grep /Users/thaothai/Desktop/Terminology_Creation/mozilla_master/$lang > /Users/thaothai/Desktop/Terminology_Creation/python/languages/$lang.txt
done

echo "done"
