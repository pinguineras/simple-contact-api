<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use App\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ExampleController
 *
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{

    /**
     * Get a contact from database
     *
     * @param null|integer $id
     *
     * @return \Illuminate\Http\JsonResponse String JSON
     */
    public function get($id = null)
    {
        try {
            if(!$id) {
                throw new Exception('Contact not defined');
            }

            $contact = Contacts::find($id);

            if (!$contact) {
                $statusCode = 404;
                throw new Exception('Contact not found');
            }

            $contact->toArray();

            return response()->json(['contact' => $contact], 200);

        } catch(Exception $e) {

            return response()->json(['error' => $e->getMessage()], (isset($statusCode) ? $statusCode : 500));
        }
    }

    /**
     * Create a new contact on databse
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $data = $request->all();

            /* Validate the create request */
            $validator = Validator::make($data, [
                'name'          => 'required|max:80',
                'email'         => 'required|email|unique:contacts,email',
                'phone'         => 'max:30',
                'description'   => 'required'
            ]);

            if($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $contact = new Contacts();
            $contact->name = $data['name'];
            $contact->email = $data['email'];
            $contact->description = $data['description'];

            if (isset($data['phone'])) {
                $contact->phone = $data['phone'];
            }

            $create = $contact->save();
            $contactId = DB::getPdo()->lastInsertId();

            return response()->json([
                'message'   => 'Contact created with success',
                'data'      => ['contact_id'   => $contactId]
            ], 201);

        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param Request       $request
     * @param null|integer  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id = null)
    {
        try {
            $data = $request->all();

            if(!$id || !is_numeric($id)) {
                throw new Exception('Contact not defined');
            }

            /* Validate the update request */
            $validator = Validator::make($data, [
                'name'          => 'max:80',
                'phone'         => 'max:30',
                'email'         => 'required|email|max:255|unique:contacts,email,' . $id,
            ]);

            if($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $contact = Contacts::find($id);

            if(!$contact) {
                $statusCode = 404;
                throw new Exception('Contact not found.');
            }

            if (isset($data['name'])) {
                $contact->name = $data['name'];
            }

            if (isset($data['phone'])) {
                $contact->phone = $data['phone'];
            }

            if (isset($data['email'])) {
                $contact->email = $data['email'];
            }

            if (isset($data['description'])) {
                $contact->description = $data['description'];
            }

            $contact->update();

            return response()->json([
                'message'   => 'Contact updated with success'
            ], 200);

        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], (isset($statusCode) ? $statusCode : 500));
        }
    }

    /**
     * @param null|integer $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id = null)
    {
        try {

            if(!$id || !is_numeric($id)) {
                throw new Exception('Contact not defined');
            }

            $contact = Contacts::find($id);

            if(!$contact) {
                $statusCode = 404;
                throw new Exception('Contact not found.');
            }

            $contact->delete();

            return response()->json([
                'message'   => 'Contact deleted with success'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], (isset($statusCode) ? $statusCode : 500));
        }

    }


}
