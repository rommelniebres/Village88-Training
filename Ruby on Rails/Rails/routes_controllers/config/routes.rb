Rails.application.routes.draw do
    get "hello" => "controllers#hello"
    get 'say/:id' => 'controllers#say_hello'
    get 'say/:id/:id2' => 'controllers#say_name'
    get "times" => "controllers#times"
    root 'controllers#say'
    get "times/restart" => "controllers#times_restart"
  
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
