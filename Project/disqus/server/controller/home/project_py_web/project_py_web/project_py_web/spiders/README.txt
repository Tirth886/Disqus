******************
mysql password:
helloworld
******************

hear the same guideline for "scrapy" and (data_scrapy.py)

******************
Q1.
How to run data_scrapy.py ???

A1.
notes: don't use the direct the run the program 

<<<---RUN--->>>
USING THE TERMINAL AND WRITE THE COMMMAND:

CODES:->
		eg:
			scrapy crawl <your_program_name>
		command:
			scrapy crawl quotes
---------------------------------------------------------

******************
Q2.
how to open "shell" in terminal ???

A2.
<<<---shell--->>>
WEBSITE IN OPEN POWER SHELL WRITE THE COMMAND:

notes:you got response 200 that's ohk 200 means "OK"
CODES:->
		eg:
			scrapy shell <website_url>
		---
		eg:
			scrapy shell "http://quotes.toscrape.com/"
		---
		eg: of the data from title:
			response.css("title::text").extract_first()
		---
		eg:
			response.css("title::text")[0].extract_first()
		---
		eg: loop to print multipal:
		a=10
		for i in range(a):
			response.css("span.text::text")[i].extract()
			print(i)
		---
		eg: anthoer loop 
		a=10
		for i in range(a):
			response.css(".author::text")[i].extract()
		---


-*-*-*-*-*-*-*-*-*-*-*-.XPATH-*-*-*-*-*-*-*-*-*-*-*-
eg: of <--Xpath--> all data extract
	response.xpath("//span[@class='text']/text()").extract()
---
eg: Xpath using extract_first DATA
	 response.xpath("//span[@class='text']/text()").extract_first()
---

-*-*-*-*-*-*-*-*-*-*-*-.XPATH and .CSS-*-*-*-*-*-*-*-*-*-*-*-

eg: How to find "href" tag values:
	response.css("li.next a").xpath("@href").extract()
eg: all href address find:
	response.css("a").xpath("@href").extract()
	 
---------------------------------------------------------

******************
Q3.
hear the title::text means is convert the tags to title ???

A3.
CODES:->
        eg:
        ['<title>Quotes to Scrape</title>']
        use "::" then convert the text formate

        eg:
        ['Quotes to Scrape']

        hear the "extract_first" use to start the fatch the first text to title
        eg:
            'Quotes to Scrape'
---------------------------------------------------------

******************
Q4.
