class ControllersController < ApplicationController
    def index
    end
    def hello
        render plain: 'Hello CodingDojo!'
    end

    def say_hello
        render plain: "Saying #{params[:id].capitalize}!"
    end

    def say_name
        render plain: "Saying #{params[:id].capitalize} #{params[:id2].capitalize}!"
    end
    
    def say
        render plain: "What do you want me to say???"
    end

    def times
        session[:counter] = session[:counter].nil? ? 1 : session[:counter]+1
        render plain: "You visited this url #{session[:counter]} time"
    end

    def times_restart
        session[:counter] = nil
        redirect_to '/times'
    end
end
