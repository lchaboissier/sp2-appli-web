<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $plannedVisits = ApiModel::get('getPlannedVisit');
        $finishedVisits = ApiModel::get('getFinishedVisit');
        return view('visit.index',['finishedVisits'=>$finishedVisits, 'plannedVisits'=>$plannedVisits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $practitioners = ApiModel::get('getPractitioners');
        return view('visit.create',['practitioners' => $practitioners]);
    }

    public function createConfirmationVisit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'practitioner_id' => 'required',
            'attendedDate' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors([
                'formulaire' => 'Erreur : Veuillez remplir tous les champs requis.',
            ]);
        }
        else {
            $apiResponse = ApiModel::post('visit/store', [
                'practitioner_id' => $request->practitioner_id,
                'attendedDate' => date('d-m-Y H:i:s', strtotime($request->attendedDate)),
                'visitstate_id' => 3,
            ]);
            if (isset($apiResponse->success)) {
                $visit = ApiModel::get('getVisit');
                $message = "La plannification de la visite a bien été enregistrée !";
                return view('visit.index', ['visits' => $visit, 'message' => $message]);
            } else {
                return back()->withErrors([
                    'formulaire' => 'La plannification de la visite ne peut pas être effectuée.'
                ]);
            }

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$visit = ApiModel::post('visit.store');

        //return view('visit.create', ['visits' => $visit]);
    }


    public function show($id)
    {
        $visit = ApiModel::get('getVisitById/' . $id);
        return view('visit.show', ['visit' => $visit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    public function delete($id)
    {
        $visit = ApiModel::get('getVisitById/'.$id);
        return view('visit.delete', ['visit' => $visit]);
    }


    /**
     * @param Visit $visit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Visit $visit)
    {
        $delete = ApiModel::put('cancelVisit/' . $visit);
        if ($delete == null) {
            return back()->withErrors([
                'visit' => 'Cette visite ne peut être supprimée.',
            ]);
        } else {
            $plannedVisits = ApiModel::get('getPlannedVisit');
            $finishedVisits = ApiModel::get('getFinishedVisit');
            $message = "La visite a bien été supprimée.";
            return view('visit.index', ['message' => $message, 'plannedVisits'=>$plannedVisits, 'finishedVisits'=>$finishedVisits]);
        }
    }
}
