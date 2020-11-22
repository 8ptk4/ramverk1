---
---
API documentation geolocation
=========================

Geolocation API that returns longitude, latitude based on given ip input.

#### Try it
Example with ipv6:<br>
[/geo?ipAddress=172.16.254.1](http://www.student.bth.se/~paka17/dbwebb-kurser/ramverk1/me/redovisa/htdocs/geo?ipAddress=2001:4860:4860::8844 )

#### Get the dataset
The input can be of the following values both ipv4 or ipv6:

ipv4: `/geo?ipAddress=127.0.0.1`<br> 
ipv6: `/geo?ipAddress=2001:4860:4860::8844`<br> 

#### GET
```
GET /geo?ipAddress=[dataset]
GET /geo?ipAddress=2001:4860:4860::8844
```

Results
```
ip	"2001:4860:4860::8844"
type	"ipv6"
continent_code	"NA"
continent_name	"North America"
country_code	"US"
country_name	"United States"
region_code	"CA"
region_name	"California"
city	"Mountain View"
zip	"94043"
latitude	37.38801956176758
longitude	-122.07431030273438
location	
geoname_id	5375480
capital	"Washington D.C."
languages	
0	
code	"en"
name	"English"
native	"English"
country_flag	"http://assets.ipstack.com/flags/us.svg"
country_flag_emoji	"🇺🇸"
country_flag_emoji_unicode	"U+1F1FA U+1F1F8"
calling_code	"1"
is_eu	false
```