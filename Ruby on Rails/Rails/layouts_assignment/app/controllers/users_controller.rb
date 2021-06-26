class UsersController < ApplicationController
    layout 'two_column'
    def index
        @users = User.all
    end
end
