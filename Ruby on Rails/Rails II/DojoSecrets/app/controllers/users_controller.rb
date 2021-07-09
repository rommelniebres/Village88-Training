class UsersController < ApplicationController
    skip_before_action :require_login, only: [:new, :create]
    before_action :check_current_user, except: [:new, :create]

    def new
        
    end

    def show
        @user = User.find(params[:id])
        if @user.secrets
            @secrets = User.find(params[:id]).secrets
        end
    end

    def edit
        @user = User.find(params[:id])
    end

    def create 
        @user = User.new(name: params[:Name], email: params[:Email], password: params[:Password])
        if @user.save
            session[:user_id] = @user.id
            session[:name] = @user.name
            redirect_to '/sessions/new'
        else 
            flash[:errors] = ["can't be blank"]
            redirect_to '/users/new'
        end
    end

    def update
        user = User.find(params[:id])
        user.name = params[:Name]
        user.email = params[:Email]
        user.password = params[:Password]
        if user.save
            session[:user_id] = user.id
            session[:name] = user.name
            redirect_to '/sessions/new'
        else
            flash[:errors] = user.errors.full_messages
            redirect_to "/users/#{params[:id]}/edit"
        end
    end

    def destroy
        user = User.find(params[:id])
        user.destroy
        session.destroy
        redirect_to '/users/new'
    end

    private
        def check_current_user 
            if session[:user_id] != params[:id].to_i
                redirect_to "/users/#{session[:user_id]}"
            end
        end
end
