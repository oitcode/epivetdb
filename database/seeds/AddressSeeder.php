<?php

use Illuminate\Database\Seeder;

/* Use related models. */
use App\State;
use App\District;
use App\LocalBody;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * --------------------------------------------------------------------
         * Below is the algorithm to seed states, districts, and local bodies
         * from the csv file.
         * --------------------------------------------------------------------
         *
         * Foreach line in csv file
         *
         *    $state = 5th field
         *    $district = 4th field
         *    $localBody = 2nd field
         *    $localBodyType = 3rd field
         *
         *    $stateId = findOrCreate($state)
         *
         *    $districtId = findOrCreate($district)
         *    If new district
         *        $district->state_id = $stateId
         *
         *    $localBody = Create($localBody)
         *    $localBody->district_id = $districtId
         *
         */

         /* Todo: Exception handling. */

         $row = 0;
         $stateCount = 0;
         $districtCount = 0;
         $localBodyCount = 0;
         $handle = fopen(base_path("database/csv/local_bodies.csv"), "r");
         if ($handle) {
             while (($data = fgetcsv($handle, 1000, ",")) !== false) {

                 $stateName = $data[4];
                 $districtName = $data[3];
                 $localBodyName = $data[1];
                 $localBodyType = $data[2];

                 /**
                  * Check if state is in db. Else create one.
                  */
                 $state = State::where('name', $stateName)->first();
                 if (! $state) {
                     /* State not in database yet. */
                     $newState = new State;
                     $newState->name = $stateName;
                     $newState->save();
                     $stateId = $newState->state_id;
                     echo "Row: $row State ID: $stateId\n";
                     $stateCount++;
                 } else {
                     $stateId = $state->state_id;
                 }

                 /**
                  * Check if district is in db. Else create one.
                  */
                 $district = District::where('name', $districtName)->first();
                 if (! $district) {
                     /* District not in database yet. */
                     $newDistrict = new District;
                     $newDistrict->name = $districtName;
                     $newDistrict->state_id = $stateId;
                     $newDistrict->save();
                     $districtId = $newDistrict->district_id;
                     $districtCount++;
                 } else {
                     $districtId = $district->district_id;
                 }

                 /**
                  * Check if local body is in db. Else create one.
                  */
                 $localBody = LocalBody::where('name', $localBodyName)->first();
                 if (! $localBody) {
                     /* Local body not in database yet. */
                     $newLocalBody = new LocalBody;
                     $newLocalBody->name = $localBodyName;
                     $newLocalBody->type = $localBodyType;
                     $newLocalBody->district_id = $districtId;
                     $newLocalBody->save();
                     $localBodyId = $newLocalBody->local_body_id;
                     $localBodyCount++;
                 } else {
                     $localBodyId = $localBody->local_body_id;
                 }
                 $row++;
             }
             fclose($handle);
             echo "Success: State, District, and Local bodies seeded.\n";
             echo "=====\n";
             echo "Total\n";
             echo "=====\n";
             echo "State: $stateCount\n";
             echo "District: $districtCount\n";
             echo "Local Body: $localBodyCount\n";
             echo "Total Rows: $row\n";
         } else {
             die("Error: Cannot open csv file\n");
         }
    }
}
