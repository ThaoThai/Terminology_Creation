##################################
# Evaluate accuracy of translate files
# with Pootle terminologies file
#
###################################

#!/bin/bash

cut -d';' -f1 $1 | sort -u > $3
cut -d';' -f1 $2 | sort -u > $4
grep -ixf $3 $4
#rm $3
#rm $4
