class UsersController < ApplicationController
    def create
        @user = User.new(username: params[:username])
        if @user.save
            flash[:notice] = ["Welcome, #{@user.username}"]
            redirect_to posts_path
        else
            flash[:notice] = @user.errors.full_messages
            redirect_to new_user_path
        end
    end
    
    def show
    end
end
