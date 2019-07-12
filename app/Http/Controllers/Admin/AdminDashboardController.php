<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DiseaseReport;
use App\Disease;


class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* Only for authenticated users. */
        $this->middleware('auth');

        /* Only for admin. */
        $this->middleware('is_admin');
    }

    /**
     * Get recent diseases.
     *
     */
    public function getRecentDiseases($num=1)
    {
        $count = 0;
        $diseaseIds = [];

        $diseaseReports = DiseaseReport::orderBy('created_at', 'desc')
                          ->get();
        
        foreach ($diseaseReports as $diseaseReport) {
            if (!in_array($diseaseReport->disease_id, $diseaseIds)) {
                $diseaseIds[] = $diseaseReport->disease_id;
                $count++;
            }
            
            if ($count == $num) {
                break;
            }
        }
        
        return $diseaseIds;
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminDashboard()
    {
        /* Recent report submissions */
        $recentReports = DiseaseReport::orderBy('created_at', 'desc')
                         ->take(5)
                         ->get();

        /* Recent Disease total counts */
        // get each disease 
        // for each disease
        //    get reoprt
        //    calculate the sum
        //    put disease and sum in array
        // endfor
        // pass the array to view

        /* Disease info array */
        $diseaseInfos = [];

        /* Get recent diseases */
        $recentDiseaseIds = $this->getRecentDiseases(5);

        /* Get total counts for each recent disease */
        foreach ($recentDiseaseIds as $recentDiseaseId) {
            $disease = Disease::find($recentDiseaseId);

            $diseaseReports = DiseaseReport::where('disease_id', $recentDiseaseId)->get();

            // Total array
            $total = [
                'totalNumOfOutbreaks' => 0,
                'totalNumOfSusceptible' => 0,
                'totalNumOfAffected' => 0,
                'totalNumOfDead' => 0,
                'totalNumOfVaccinated' => 0,
                'totalNumOfTreated' => 0,
                'totalRegVacc' => 0,
                'totalOutbreakResVacc' => 0,
                'totalDestroyed' => 0,
            ];

            foreach ($diseaseReports as $diseaseReport) {
                $total['totalNumOfOutbreaks'] += $diseaseReport->num_of_outbreaks;
                $total['totalNumOfSusceptible'] += $diseaseReport->num_of_susceptible;
                $total['totalNumOfAffected'] += $diseaseReport->num_of_affected;
                $total['totalNumOfDead'] += $diseaseReport->num_of_dead;
                $total['totalNumOfVaccinated'] += $diseaseReport->num_of_vaccinated;
                $total['totalNumOfTreated'] += $diseaseReport->num_of_treated;
                $total['totalRegVacc'] += $diseaseReport->reg_vacc;
                $total['totalOutbreakResVacc'] += $diseaseReport->outbreak_res_vacc;
                $total['totalDestroyed'] += $diseaseReport->destroyed;
            }

            // Disease name
            $diseaseName = $disease->name;

            // Single disease info
            $singleDiseaseInfo =  [
              'diseaseName' => $diseaseName,
              'total' => $total,
            ];

            // Add single disease info to disease info array
            $diseaseInfos[] = $singleDiseaseInfo;
        }

        return view('admin.dashboard-main')
            ->with('recentReports', $recentReports)
            ->with('diseaseInfos', $diseaseInfos);
    }
}
