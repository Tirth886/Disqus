import sqlite3

conn = sqlite3.connect('myquotes.db')
curr = conn.cursor()

curr.execute("""create table quotes_tb(
                title text,
                author text,
                tag text
                )""")
curr.execute("""insert into quotes_tb values ("python program","henil","deadpool")""")

conn.commit()
conn.close()
