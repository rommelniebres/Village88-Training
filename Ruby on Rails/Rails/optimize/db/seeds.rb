# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the bin/rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: 'Star Wars' }, { name: 'Lord of the Rings' }])
#   Character.create(name: 'Luke', movie: movies.first)
# we require 'open-uri' to request the html files
require 'open-uri'
teams = [
    ["Atlanta Hawks", "Skyhawk", "Philips Arena"],
    ["Boston Celtics", "Lucky the Leprechaun", "TD Garden"],
    ["Brooklyn Nets", "BrooklyKnight", "Barclays Center"],
    ["Charlotte Hornets", "Hugo the Hornet", "Spectrum Center"],
    ["Chicago Bulls", "Benny the Bull", "United Center"],
    ["Cleveland Cavaliers", "Moondog", "Quicken Loans Arena"],
    ["Dallas Mavericks", "Champ", "American Airlines Center"],
    ["Denver Nuggets", "Rocky the Mountain Lion", "Pepsi Center"],
    ["Detroit Pistons", "Hooper", "The Palace of Auburn Hills"],
    ["Golden State Warriors", "Thunder", "Oracle Arena"],
    ["Houston Rockets", "Clutch", "Toyota Center"],
    ["Indiana Pacers", "Boomer the Panther", "Bankers Life Fieldhouse"],
    ["Los Angeles Clippers", "Chuck", "Staples Center"],
    ["Los Angeles Lakers", "Jack Nicholson", "Staples Center"],
    ["Memphis Grizzlies", "Griz", "FedExForum"],
    ["Miami Heat", "Burnie", "American Airlines Arena"],
    ["Milwaukee Bucks", "Bango", "BMO Harris Bradley Center"],
    ["Minnesota Timberwolves", "Crunch the Wolf", "Target Center"],
    ["New Orleans Pelicans", "Pierre the Pelican", "Smoothie King Center"],
    ["New York Knicks", "Spike Lee", "Madison Square Garden"],
    ["Oklahoma City Thunder", "Rumble the Bison", "Chesapeake Energy Arena"],
    ["Orlando Magic", "Stuff the Magic Dragon", "Amway Center"],
    ["Philadelphia 76ers", "Franklin the Dog", "Wells Fargo Center Philadelphia"],
    ["Phoenix Suns", "The Suns Gorilla", "Talking Stick Resort Arena"],
    ["Portland Trail Blazers", "Blaze the Trail Cat", "Moda Center"],
    ["Sacramento Kings", "Slamson the Lion", "Golden 1 Center"],
    ["San Antonio Spurs", "The Coyote", "AT&T Center"],
    ["Toronto Raptors", "Raptor", "Air Canada Centre"],
    ["Utah Jazz", "Jazz Bear", "Vivint Smart Home Arena"],
    ["Washington Wizards", "G. Wiz", "Verizon Center"]
]
#This contains the css to fetch the name of players in the ESPN site.
#Learn more about css combinators in https://www.w3schools.com/css/css_combinators.asp
css_target = "td.Table__TD--headshot + td > div > a"
# Here, we are using the Nokogiri gem (already comes with Rails), to scrape the ESPN website for the list of players.
# For more information on Nokogiri, you can go to their documentation or visit http://www.nokogiri.org/
atlanta_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/atl/atlanta-hawks")).css(css_target)
boston_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/bos/boston-celtics")).css(css_target)
brooklyn_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/bkn/brooklyn-nets")).css(css_target)
charlotte_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/cha/charlotte-hornets")).css(css_target)
chicago_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/chi/chicago-bulls")).css(css_target)
cleveland_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/cle/cleveland-cavaliers")).css(css_target)
dallas_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/dal/dallas-mavericks")).css(css_target)
denver_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/den/denver-nuggets")).css(css_target)
detroit_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/det/detroit-pistons")).css(css_target)
warriors_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/gs/golden-state-warriors")).css(css_target)
houston_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/hou/houston-rockets")).css(css_target)
indiana_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/ind/indiana-pacers")).css(css_target)
clippers_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/lac/la-clippers")).css(css_target)
lakers_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/lal/los-angeles-lakers")).css(css_target)
memphis_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/mem/memphis-grizzlies")).css(css_target)
miami_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/mia/miami-heat")).css(css_target)
milwaukee_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/mil/milwaukee-bucks")).css(css_target)
minnesota_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/min/minnesota-timberwolves")).css(css_target)
nola_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/no/new-orleans-pelicans")).css(css_target)
knicks_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/ny/new-york-knicks")).css(css_target)
okc_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/okc/oklahoma-city-thunder")).css(css_target)
orlando_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/orl/orlando-magic")).css(css_target)
phili_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/phi/philadelphia-76ers")).css(css_target)
phoenix_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/phx/phoenix-suns")).css(css_target)
portland_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/por/portland-trail-blazers")).css(css_target)
sacramento_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/sac/sacramento-kings")).css(css_target)
spurs_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/sa/san-antonio-spurs")).css(css_target)
toronto_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/tor/toronto-raptors")).css(css_target)
utah_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/utah/utah-jazz")).css(css_target)
washington_players = Nokogiri::HTML(open("http://www.espn.com/nba/team/roster/_/name/wsh/washington-wizards")).css(css_target)
players = [
    atlanta_players,
    boston_players,
    brooklyn_players,
    charlotte_players,
    chicago_players,
    cleveland_players,
    dallas_players,
    denver_players,
    detroit_players,
    warriors_players,
    houston_players,
    indiana_players,
    clippers_players,
    lakers_players,
    memphis_players,
    miami_players,
    milwaukee_players,
    minnesota_players,
    nola_players,
    knicks_players,
    okc_players,
    orlando_players,
    phili_players,
    phoenix_players,
    portland_players,
    sacramento_players,
    spurs_players,
    toronto_players,
    utah_players,
    washington_players
]
players.each_with_index do |roster, index|
    Team.create(name: teams[index][0], mascot: teams[index][1], stadium: teams[index][2])
    roster.each do |player|
        Team.last.players.create(name: player.text)
    end
end 
