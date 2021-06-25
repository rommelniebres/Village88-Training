json.extract! survey, :id, :name, :dojo_location, :favorite_language, :comment, :created_at, :updated_at
json.url survey_url(survey, format: :json)
