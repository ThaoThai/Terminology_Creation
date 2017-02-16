import polib
import string
import re
import collections
import sys
reload(sys)
sys.setdefaultencoding('utf-8')

dict = ["ach","af","ak","ar","az","bg","bm","bn_BD","bs","ca","dsb","es_MX","eu","fa","ff","fj","ga-IE","gn_BO","gn_PY","ha","haw","he","hi_IN","hr","hsb","ht","hu","hy_AM","id","ig","is","km","kn","ks","ku","lg","lt","lv","mg","ml","mr","ms","my","nb_NO","ne","ny","or","pa","ps","pt","rn","ro","rw","scn","si","sl","sm","sr","ss","su","sv","sw","ta","te","tk","tl","tn","tr","ts","tt","ur","uz","vec","vi","wa","wo","xh","yo","zu"]
for i in dict:
    with open('/Users/thaothai/Desktop/Terminology_Creation/results/pootle/%s.pootle' % (i)) as f:
        pofiles = f.read().splitlines()
    file1 = open('/Users/thaothai/Desktop/Terminology_Creation/results/%s/%s-pootle'%(i,i), 'w')
    for po in pofiles:
        po = polib.pofile(po)
        NumberOfSentences= len(po.translated_entries())
        if NumberOfSentences == 0:
            continue
            #Create a list for english and translated terms
        for entry in po.translated_entries():
            word = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgid.encode('utf-8'))
            word2 = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.encode('utf-8'))
            Source = word
            Target = word2
            if len(Source) > 1 or len(Target) > 1:
                file1.write(Source + ";" + Target + "\n")
    file1.close()
