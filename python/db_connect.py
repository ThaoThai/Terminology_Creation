import mysql.connector
from datetime import date, datetime, timedelta


con = mysql.connector.connect(user='hopper.slu.edu', password='database',
                              host='localhost',
                              database='terminology_creation')
with open('viTranslation.txt', 'r') as f:
    for line in f:
        data = line.split(";",1)
        cur = con.cursor()
        cur.execute("INSERT INTO terminology"
            "(date_created,eng,vi) VALUES(%s,%s,%s)",(datetime.now(),data[0],data[1]))
        con.commit()
con.close()


