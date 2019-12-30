import scrapy
from ..items import ProjectPyWebItem


# command: scrapy crawl quotes
class DataScrapy(scrapy.Spider):
    # program name is "quotes"
    name = 'quotes'  # hear the name is "quotes"
    page_number = 2
    start_urls = [
        'http://quotes.toscrape.com/page/1/'
    ]

    def parse(self, response):
        items = ProjectPyWebItem()
        all_div_quotes = response.css('div.quote')

        for quotes in all_div_quotes:
            title = quotes.css('span.text::text').extract()
            author = quotes.css('.author::text').extract()
            tag = quotes.css('.tag::text').extract()

            items['title'] = title
            items['author'] = author
            items['tag'] = tag
            yield items

        next_page = 'http://quotes.toscrape.com/page/' + str(DataScrapy.page_number) + '/'
        if DataScrapy.page_number < 11:
            DataScrapy.page_number += 1
            yield response.follow(next_page, callback=self.parse)


"""
notes: don't use the direct the run the program 
------------------RUN------------------
USING THE TERMINAL AND WRITE THE COMMAND:
command:
    scrapy crawl quotes
mysql password:
    helloworld
"""
