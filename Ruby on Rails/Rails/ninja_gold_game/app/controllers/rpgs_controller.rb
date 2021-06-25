class RpgsController < ApplicationController
    def index
        session[:gold] = session[:gold].nil? ? 0 : session[:gold]
        # session[:log] = session[:log].nil? ? 'Start the game' : session[:log]
        session[:log] ||= []
    end

    def farm
        gold = rand(10..20)
        time = Time.new.strftime("%B-%d-%Y %H:%M:%S")
        session[:gold] += gold
        session[:log].push("Earned #{gold} golds from the #{__method__.to_s}! ( #{time})")
        redirect_to '/'
    end

    def cave
        gold = rand(5..10)
        time = Time.new.strftime("%B-%d-%Y %H:%M:%S")
        session[:gold] += gold
        session[:log].push("Earned #{gold} golds from the #{__method__.to_s}! ( #{time})")
        redirect_to '/'
    end

    def house
        gold = rand(2..5)
        time = Time.new.strftime("%B-%d-%Y %H:%M:%S")
        session[:gold] += gold
        session[:log].push("Earned #{gold} golds from the #{__method__.to_s}! ( #{time})")
        redirect_to '/'
    end

    def casino
        gold = rand(-50..50)
        time = Time.new.strftime("%B-%d-%Y %H:%M:%S")
        session[:gold] += gold
        if gold < 0
            session[:log].push("Loss #{gold} golds from the #{__method__.to_s}!..Ouch.. ( #{time})")
        else
            session[:log].push("Earned #{gold} golds from the #{__method__.to_s}! ( #{time})")
        end
        redirect_to '/'
    end

    def reset
        reset_session
        redirect_to '/'
    end
end
