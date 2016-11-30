import polib
import string
import functions
import re

dict = ["ach.txt","an.txt", "bo.txt", "brx.txt", "bs.txt", "cak.txt", "cly.txt", "kok.txt", "lij.txt", "lo.txt", "mai.txt", "meh.txt", "mxp.txt", "nd.txt", "neb.txt", "trc.txt", "tt.txt", "trs.txt", "wo.txt", "zar.txt", "zty.txt"]
for text in dict:
    with open('/Users/thaothai/Desktop/Terminology_Creation/python/languages/%s' % (text)) as f:
        pofiles = f.read().splitlines()
    file1 = open('/Users/thaothai/Desktop/Terminology_Creation/python/directTrans/%s'%(text), 'w')
    for po_file in pofiles:
        po = polib.pofile(po_file)
        NumberOfSentences = len(po.translated_entries())
        if NumberOfSentences == 0:
            exit()
        # Create a list for english and translated terms
        for entry in po.translated_entries():
            SplitSource = entry.msgid.upper().split()
            if len(SplitSource) == 1:
                word = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\'\=+,-\.\)\(]|[...]|[--]", "", entry.msgid.upper().encode('utf-8'))
                if word in open('/Users/thaothai/Desktop/Terminology_Creation/python/directTrans/%s'%(text)).read():
                    pass
                else:
                    word2 = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\'\=+,-\.\)\(]|[...]|[--]", "",
                                   entry.msgstr.upper().encode('utf-8'))
                    file1.write(word + "; " + word2 + '\n')
    file1.close()

