#   Retrieve all players, then write a program that will loop through each player and 
#   display their team name, mascot and stadium. How many queries have we done?
#   802 queries (1 query per item)
    players = Player.includes(:team).where("teams.id = team_id").references(:team)
    players.each do |player|
        puts "Player: #{player.name} | Team: #{player.team.name} | Stadium: #{player.team.stadium} | Mascot: #{player.team.mascot}"
    end
    
#   Retrieve all players and write a program to loop through each player and their 
#   team name, mascot and stadium using .includes. How many queries have we done now?
#   1 query for the whole 
    players = Player.includes(:team).where("teams.id = team_id").references(:team)
    players.each do |player|
        puts "Player: #{player.name} | Team: #{player.team.name} | Stadium: #{player.team.stadium} | Mascot: #{player.team.mascot}"
    end

#   Retrieve all players from the 'Chicago Bulls' by using .includes
    players = Player.includes(:team).where("teams.name = 'Chicago Bulls'").references(:team)
    players.each do |player|
        puts "Player: #{player.name} | Team: #{player.team.name} | Stadium: #{player.team.stadium} | Mascot: #{player.team.mascot}"
    end

#   Retrieve all players along with the team name that play at the 'Staples Center'
    players = Player.includes(:team).where("teams.stadium = 'Staples Center'").references(:team)
    players.each do |player|
        puts "Player: #{player.name} | Team: #{player.team.name} | Stadium: #{player.team.stadium} | Mascot: #{player.team.mascot}"
    end

#   Retrieve all teams that have any player that start their name with the letter 'Z' 
#   by using .includes and .joins
    players = Player.includes(:team).joins(:team)
    players.each do |player|
        if(player.name[0] == 'Z')
            puts "Player: #{player.name} | Team: #{player.team.name} | Stadium: #{player.team.stadium} | Mascot: #{player.team.mascot}"
        end
    end