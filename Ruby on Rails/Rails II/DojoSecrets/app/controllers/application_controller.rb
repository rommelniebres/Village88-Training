class ApplicationController < ActionController::Base
    before_action :require_login
    def current_user
        User.find(session[:user_id]) if session[:user_id]
    end
    helper_method :current_user

    private
  
    def require_login 
        if session[:user_id]
            session[:user_id]
        else
            flash[:errors] = ['Please Login first']
            redirect_to "/sessions/new"
        end
    end
end
