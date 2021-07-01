class PostsController < ApplicationController
    def index
        @posts = Post.all
    end
    def create
        puts params
        @post = Post.new(message: params[:message], user: User.first)
        
        if @post.save
            flash[:notice] = ["Post created!"]
            redirect_to posts_path
        else
            flash[:notice] = @post.errors.full_messages
            redirect_to posts_path
        end
    end
    def logout
        session.destroy
        redirect_to new_user_path
    end
end
