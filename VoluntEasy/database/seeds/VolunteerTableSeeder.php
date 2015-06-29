<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as User;

class VolunteerTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     * Use php artisan db:seed to run the seed files.
     *
     * @return void
     */
    public function run()
    {
	    // Identification types.
	    DB::table('identification_types')->delete();

	    $types = [
		    ['description' => 'Α.Δ.Τ.'],
		    ['description' => 'Διαβατήριο'],
		    ['description' => 'Άδεια παραμονής'],
	    ];

	    DB::table('identification_types')->insert($types);

	    // Marital statuses.
	    DB::table('marital_statuses')->delete();

	    $statuses = [
		    ['description' => 'Άγαμος/η'],
		    ['description' => 'Παντρεμένος/η'],
		    ['description' => 'Χήρος/α'],
		    ['description' => 'Διαζευγμένος/η'],
	    ];

	    DB::table('marital_statuses')->insert($statuses);

	    // Driver license types.
	    DB::table('driver_license_types')->delete();

	    $license_types = [
		    ['description' => 'Χωρίς δίπλωμα'],
		    ['description' => 'Α κατηγορίας'],
		    ['description' => 'A1 κατηγορίας'],
		    ['description' => 'B κατηγορίας'],
		    ['description' => 'Γ κατηγορίας'],
		    ['description' => 'Γ+Ε κατηγορίας'],
	    ];

	    DB::table('driver_license_types')->insert($license_types);

	    // Availability frequency messages.
	    DB::table('availability_freqs')->delete();

	    $frequencies = [
		    ['description' => '1-2 φορές την εβδομάδα'],
		    ['description' => '1-2 φορές το δεκαπενθήμερο'],
		    ['description' => '1-2 φορές τον μήνα'],
	    ];

	    DB::table('availability_freqs')->insert($frequencies);

	    // Work status messages.
	    DB::table('work_statuses')->delete();

	    $statuses = [
		    ['description' => 'Φοιτητής'],
		    ['description' => 'Εργαζόμενος'],
		    ['description' => 'Άνεργος'],
		    ['description' => 'Συνταξιούχος'],
	    ];

	    DB::table('work_statuses')->insert($statuses);

	    // Availability time.
	    DB::table('availability_time')->delete();

	    $availability = [
		    ['description' => 'Πρωί'],
		    ['description' => 'Μεσημέρι'],
		    ['description' => 'Απόγευμα'],
	    ];

	    DB::table('availability_time')->insert($availability);

	    // Volunteer interests.
	    DB::table('interests')->delete();

	    $interests = [
		    ['category' => 'Γενική κατηγορία', 'description' => 'Πολιτισμός και εκπαίδευση'],
		    ['category' => 'Γενική κατηγορία', 'description' => 'Αθλητισμός'],
		    ['category' => 'Περιβάλλον', 'description' => 'Ενημέρωση/ευαισθητοποίηση πολιτών σε περιβαλλοντικά θέματα'],
		    ['category' => 'Περιβάλλον', 'description' => 'Καθαρισμός δημοσίου χώρου'],
		    ['category' => 'Περιβάλλον', 'description' => 'Βάψιμο επιφανειών'],
		    ['category' => 'Περιβάλλον', 'description' => 'Antigraffiti'],
		    ['category' => 'Περιβάλλον', 'description' => 'Δεντροφύτευση'],
		    ['category' => 'Κοινωνική αλληλεγγύη', 'description' => 'Κόμβος αλληλεγγύης πολιτών'],
		    ['category' => 'Κοινωνική αλληλεγγύη', 'description' => 'Παροχή φροντίδας ως εθελοντής γείτονας'],
	    ];

	    DB::table('interests')->insert($interests);

	    // Genders.
	    DB::table('genders')->delete();

	    $genders = [
		    ['description' => 'Άνδρας'],
		    ['description' => 'Γυναίκα'],
	    ];

	    DB::table('genders')->insert($genders);

	    // Language list.
	    DB::table('languages')->delete();

	    $languages = [
		    ['description' => 'Ελληνικά'],
		    ['description' => 'Αγγλικά'],
		    ['description' => 'Γαλλικά'],
		    ['description' => 'Ισπανικά'],
		    ['description' => 'Γερμανικά'],
	    ];

	    DB::table('languages')->insert($languages);

	    // Education levels.
	    DB::table('education_levels')->delete();

	    $ed_levels = [
		    ['description' => 'Γυμνάσιο'],
		    ['description' => 'Λύκειο'],
		    ['description' => 'Ανώτερη'],
		    ['description' => 'Ανώτατη'],
		    ['description' => 'Μεταπτυχιακά'],
	    ];

	    DB::table('education_levels')->insert($ed_levels);

	    // Communication method.
	    DB::table('comm_method')->delete();

	    $comm_choice = [
		    ['description' => 'Ηλεκτρονικό ταχυδρομείο'],
		    ['description' => 'Τηλέφωνο οικίας'],
		    ['description' => 'Τηλέφωνο εργασίας'],
		    ['description' => 'Κινητό τηλέφωνο'],
	    ];

	    DB::table('comm_method')->insert($comm_choice);

	    // Language levels.
	    DB::table('language_levels')->delete();

	    $levels = [
		    ['description' => 'Βασικό'],
		    ['description' => 'Καλό'],
		    ['description' => 'Πολύ καλό'],
	    ];

	    DB::table('language_levels')->insert($levels);

	    // // Seed template.
	    DB::table('volunteer_statuses')->delete();

        $statuses = [
	             ['description' => 'Active'],
	             ['description' => 'Inactive'],
	             ['description' => 'Blacklisted'],
	     ];

	     DB::table('volunteer_statuses')->insert($statuses);

        // // Seed template.
        DB::table('step_statuses')->delete();

        $statuses = [
            ['description' => 'Complete'],
            ['description' => 'Incomplete'],
        ];

        DB::table('step_statuses')->insert($statuses);
    }

}
