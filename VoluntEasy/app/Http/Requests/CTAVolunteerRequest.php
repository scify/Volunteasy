<?php namespace App\Http\Requests;


class CTAVolunteerRequest extends Request {

    public function rules() {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|max:255',
            'dates' => 'required'
        ];
    }


    /**
     * Custom error messages that override those defined in validation.php file.
     *
     * @return array
     */
    public function messages() {
        return [
            'dates.required' => 'Required field'
        ];
    }
}
