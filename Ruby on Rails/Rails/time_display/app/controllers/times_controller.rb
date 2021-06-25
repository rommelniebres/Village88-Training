class TimesController < ApplicationController
    def main
        time = Time.new
        @time = time.strftime("%B-%d-%Y %H:%M:%S")
    end
end
