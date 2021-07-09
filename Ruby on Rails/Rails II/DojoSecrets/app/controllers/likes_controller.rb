class LikesController < ApplicationController
    def create
        @like = Like.new(user: User.find(params[:user_id]), secret: Secret.find(params[:id]))
        if @like.save
            @likes = Like.where(secret: Secret.find(params[:id])).count
        else 
            redirect_to '/secrets'
        end
    end

    def destroy
        if session[:user_id] != params[:user_id].to_i
            flash[:notice] = ["You can't unlike someone else's like"]
            redirect_to '/secrets' 
        else
            flash[:notice] = ["Unliking Success"]
            unlike = Like.where(user: User.find(params[:user_id])).where(secret: Secret.find(params[:id]))
            unlike.first.destroy
            @likes = Like.where(secret: Secret.find(params[:id])).count
        end   
        
    end
end
