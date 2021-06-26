class DojosController < ApplicationController
    def index
        @dojos = Dojo.all
    end

    def new
        
    end

    def create
        @dojo = Dojo.new(branch: params[:branch], street: params[:street], city: params[:city], state: params[:state])
        if @dojo.save
            flash[:success] = "Dojo branch created!"
            redirect_to '/'
        else
            flash[:error] = "Dojo branch creation error! #{@dojo.errors.full_messages.join(', ')}"
            redirect_to '/dojos/new'
        end
    end

    def show
        @dojo = Dojo.find(params[:id])
        @students = Student.where(dojo: params[:id])
    end

    def edit
        @dojo = Dojo.find(params[:id])
    end

    def update
        @dojo = Dojo.find(params[:id])
        if @dojo.update(branch: params[:branch], street: params[:street], city: params[:city], state: params[:state])
            flash[:success] = "Dojo branch updated!"
            redirect_to '/'
        else
            flash[:error] = "Dojo branch update error! #{@dojo.errors.full_messages.join(', ')}"
            redirect_to "/dojos/#{params[:id]}/edit"
        end
       
    end

    def destroy
        dojo = Dojo.find(params[:id])
        dojo.destroy
        flash[:success] = "Dojo branch delete!"
        redirect_to '/'
    end
end
