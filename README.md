# curl-crawler

# Intro:
- This is a mini project that use to get data from some local news website.
- Currently available website are: **VietNamNet.vn, Dantri.com, VNExpress.net**.
- Current available crawler method: **curl**

# Guide:
- Run project test with url http://localhost/PhpCrawler/ will put you in the home page of the application
- At home page you can input url of a news page that describle in the available list and it will return data from that page like input url, title of the news, publish date, main content of the article.
- Then you will have an option to save the data to your database or return back to home page.

# Database:
- Database use: MySql (You can use the **curl_parser.sql** in root folder to import in to your database).
- Database name: curl_parser (You can change your database name by change the DB_NAME value in Application/Config/Config line 10).






