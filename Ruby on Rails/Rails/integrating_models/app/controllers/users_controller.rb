class UsersController < ApplicationController
    def index
        render json: User.all
    end

    def show
        render json: User.find(params[:id])
    end

    def edit
        @user = User.find(params[:id])
    end

    def create
        User.create(name: params[:name])
        redirect_to '/users'
    end
    def total
        render plain: User.count
    end
end
