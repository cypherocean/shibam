<?php    

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Auth, DB, Mail, Validator, File, DataTables;

class DashboardController extends Controller {
    /** index */
        public function index(Request $request){
            $data = [];
            return view('admin.dashboard')->with(['data' => $data]);
        }
    /** index */

    /** profile */
        public function profile(){
            $path = URL('/uploads/users').'/';
            $data = User::select('id', 'name', 'email',
                                    DB::Raw("CASE
                                        WHEN ".'photo'." != '' THEN CONCAT("."'".$path."'".", ".'photo'.")
                                        ELSE CONCAT("."'".$path."'".", 'user-icon.jpg')
                                    END as photo")
                                )
                            ->where(['id' => auth()->user()->id])
                            ->first();

            return view('admin.profile')->with(['data' => $data]);
        }
    /** profile */

    /** profile-update */
        public function profile_update(Request $request){
            if($request->ajax()){ return true; }

            $id = $request->id;
            $exst_rec = User::where(['id' => $id])->first();

            $data = [
                'name' => ucfirst($request->name),
                'email' => $request->email,
                
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];

            if($request->password != '' && $request->password != NULL)
                $data['password'] = $request->password;

            if(!empty($request->file('photo'))){
                $file = $request->file('photo');
                $filenameWithExtension = $request->file('photo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $filenameToStore = time()."_".$filename.'.'.$extension;

                $folder_to_upload = public_path().'/uploads/users/';

                if(!\File::exists($folder_to_upload))
                    \File::makeDirectory($folder_to_upload, 0777, true, true);

                $data['photo'] = $filenameToStore;
            }else{
                $data['photo'] = $exst_rec->photo;
            }

            $update = User::where(['id' => $id])->update($data);

            if ($update) {
                if (!empty($request->file('photo'))) {
                    $file->move($folder_to_upload, $filenameToStore);

                    $file_path = public_path().'/uploads/users/'.$exst_rec->photo;

                    if(File::exists($file_path) && $file_path != ''){
                        if($exst_rec->photo != 'user-icon.jpg'){
                            @unlink($file_path);
                        }
                    }
                }
                return redirect()->back()->with('success', 'Profile updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update profile.')->withInput();
            }
        }
    /** profile-update */
}