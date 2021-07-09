class SecretsController < ApplicationController
    def index
        @secrets = Secret.all
    end

    def create
        secret = Secret.new(content: params[:Content], user: User.find(params[:id]))
        if secret.save
            redirect_to "/users/#{params[:id]}"
        else
            redirect_to "/users/#{params[:id]}"
        end
    end
    def delete
        if session[:user_id] != params[:id].to_i
            flash[:errors] = ["You can't delete what's not yours"]
            redirect_to "/users/#{session[:user_id]}"
        else
            secret = Secret.find(params[:secret_id])
            secret.destroy
            redirect_to "/users/#{params[:id]}"
        end
            
    end

end
