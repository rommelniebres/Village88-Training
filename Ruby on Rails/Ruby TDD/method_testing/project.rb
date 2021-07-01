class Project
    attr_accessor :name, :description, :owner, :task
    def initialize name, description, owner
      @name = name
      @description = description
      @owner = owner
      @task = []
    end
    def elevator_pitch
      "#{@name}, #{@description}, #{@owner}"
    end

    def task
        @task.join(', ')
    end

    def add_task params
        @task.push(params)
    end

    def print_tasks
        print @task.join(', ')
        @task.join(', ')
    end

    
  end