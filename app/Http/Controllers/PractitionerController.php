<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use App\Models\Practitioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PractitionerController extends Controller
{
    public function index()
    {
        $practitioners = ApiModel::get('getPractitioners');
        return view('practitioner.index',['practitioners'=>$practitioners]);
    }

    public function create()
    {
        $practitioners = ApiModel::get('getPractitioners');
        return view('practitioner.create',['practitioners' => $practitioners]);
    }

    public function createConfirmationPractitioner(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lastname' => 'nullable',
            'firstname' => 'nullable',
            'complementarySpeciality' => 'nullable',
            'address' => 'nullable',
            'email' => 'nullable',
            'website' => 'nullable',
            'meeting_online' => 'nullable',
            'tel' => 'nullable',
            'status' => 'nullable',
        ]);
        if ($validator->fails()) {
            return back()->withErrors([
                'formulaire' => 'Erreur : Veuillez remplir tous les champs requis.',
            ]);
        } else {
            $apiResponse = ApiModel::post('practitioner/store', [
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'complementarySpeciality' => $request->complementarySpeciality,
                'address' => $request->address,
                'email' => $request->email,
                'website' => $request->website,
                'meeting_online' => $request->meeting_online,
                'tel' => $request->tel,
                'status' => $request->status,
            ]);
            if (isset($apiResponse->success)) {
                $practitioners = ApiModel::get('getPractitioners');
                $message = "L'ajout du praticien a bien été enregistrée !";
                return view('practitioner.index', ['practitioners' => $practitioners, 'message' => $message]);
            } else {
                return back()->withErrors([
                    'formulaire' => 'L\'enregistrement du praticien ne peut pas être effectuée.'
                ]);
            }
        }
    }

    public function editConfirmationPractitioner(Practitioner $practitioner, Request $request)
    {
        ApiModel::put('editPractitioner/' . $practitioner);
        $practitioner->update($request->all(['lastname','firstname','complementarySpeciality','address','email','website','meeting_online','status','tel']));
        $message = "Les modifications apporté au praticien ont bien été enregistré !";
        return view('practitioner.index', ['message' => $message, 'practitioners' => $practitioner]);
    }

    public function edit($id)
    {
        $practitioner = ApiModel::get('getPractitionerById/'.$id);
        return view('practitioner.edit', ['practitioner' => $practitioner]);
    }

    public function show($id)
    {
        $practitioner = ApiModel::get('getVisitsByPractitioner/' . $id);
        //$visitsByPractitioner = ApiModel::get('getVisitsByPractitioner/' . $id);
        return view('practitioner.show', ['practitioner' => $practitioner]);
    }
}
