class StudentsController < ApplicationController
    def new
        @dojo = Dojo.find(params[:dojo_id])
    end

    def create
        @student = Student.new(first_name: params[:first_name], last_name: params[:last_name], email: params[:email], dojo: Dojo.find(params[:dojo_id]))
        if @student.save
            flash[:success] = "Student created!"
            redirect_to "/dojos/#{params[:dojo_id]}"
        else
            flash[:error] = "Student creation error! #{@student.errors.full_messages.join(', ')}"
            redirect_to "/dojos/#{params[:dojo_id]}/students/new"
        end
    end

    def show
        @dojo = Dojo.find(params[:dojo_id])
        @students = Student.where(dojo: params[:dojo_id]).and(Student.where.not(id: params[:id]))
        @student = Student.find(params[:id])
    end
    
    def edit
        @dojo = Dojo.find(params[:dojo_id])
        @student = Student.find(params[:id])
    end

    def update
        dojo = Dojo.find(params[:dojo_id])
        @student = Student.find(params[:id])
        if @student.update(first_name: params[:first_name], last_name: params[:last_name], email: params[:email], dojo: Dojo.find(params[:dojo_id]))
            flash[:success] = "Student updated!"
            redirect_to "/dojos/#{params[:dojo_id]}"
        else
            flash[:error] = "Student update error! #{@student.errors.full_messages.join(', ')}"
            redirect_to "/dojos/#{params[:dojo_id]}/students/#{params[:id]}/edit"
        end
    end

    def destroy
        student = Student.find(params[:id])
        student.destroy
        flash[:success] = "Student deleted!"
        redirect_to "/dojos/#{params[:dojo_id]}"
    end
end
