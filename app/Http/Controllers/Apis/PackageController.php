<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use App\PackageNote;
use App\Admin\Package;
use App\Admin\ImageVideoService;



class PackageController extends Controller
{
    public function showAllPackages()
    {
        $user = Auth::guard('user-api')->user();
        return response()->json($user->package);
    }
    /* return the number of packages for each package status. */
    public function NumberOfEachPackageStatus(Request $request)
    {
        if($request->to != "")
        {
            $ready = 0;
            $needRevision = 0;
            $needRequirement = 0;
            $data= [];
            $user = Auth::guard('user-api')->user();
            $packages = $user->package;
            foreach($packages as $p)
            {
                if($request->to == $p->package_to &&$p->sended == 1 ) // completed and ready to show by the client
                {
                    if ($p->package_status_id == 1) // جاهزة للإرسال
                    {
                        $ready +=1;
                    }elseif($p->package_status_id == 2) //جار المراجع
                    {
                        $needRevision +=1;
                    }elseif($p->package_status_id == 3) //مطلوب إجراء
                    {
                        $needRequirement +=1;
                    }
        
                }
            }
            $data['ready'] = $ready;
            $data['needRevision'] = $needRevision;
            
            $data['needRequirement'] = $needRequirement;
            $data['All'] = $ready + $needRevision + $needRequirement;
            return response()->json($data);
        }else
        {
            return response()->json('Error: `To` parameter required');
        }
    }
    public function packageProducts(Request $request)
    {
        if(isset($request->package_id) && $request->package_id != '')
        {
            $user = Auth::guard('user-api')->user();
            foreach($user->package as $p)
            {
                if($p->sended == 1 ) // completed and ready to show by the client
                {
                    if($p->id == $request->package_id)
                    {
                        return response()->json($p->packageProducts);
                    }    
                }
            }
        }
        else
        {
            return response()->json('Error: Missing Package Id.');
        }
    }

    public function showAllPackagesFrom(Request $request)
    {
        if ($request->to != '')
        {
            $data=[];
            $user = Auth::guard('user-api')->user();
            foreach($user->package as $p)
            {
                if($p->package_to == $request->to && $p->sended == 1)
                {
                    $data[] = $p;
                }
            }
            return response()->json($data);
    
        }else
        {
            return response()->json("Error: Missing to parameter.");
        }
    }

    public function AddNotesToPackage(Request $request)
    {
        if($request->notes != "" && $request->package_id != "")
        {
            $flag =0;

            $user = Auth::guard('user-api')->user();
            foreach($user->package as $p)
            {
                if($p->sended == 1)
                {
                    if($p->id == $request->package_id){
                    $flag =1;
                    }
                }
            }
            if($flag == 1)
            {
                PackageNote::create([
                    'user_id'=> $user->id,
                    'package_id' => $request->package_id,
                    'notes' =>$request->notes,
                    'type' => 'note'
                ]);
                return response()->json('Notes Added Successfully.', 200);

            }else
            {
                return response()->json('Invalide package ID',404);
            }

        }
        else
        {
            return response()->json('Information Required');
        }
    }

    public function AddCheckToPackage(Request $request)
    {
        if($request->notes != "" && $request->package_id != "")
        {
            $flag =0;

            $user = Auth::guard('user-api')->user();
            foreach($user->package as $p)
            {
                if($p->sended == 1)
                {
                    if($p->id == $request->package_id){
                    $flag =1;
                    }
                }
            }
            if($flag == 1)
            {
                PackageNote::create([
                    'user_id'=> $user->id,
                    'package_id' => $request->package_id,
                    'notes' =>$request->notes,
                    'type' => 'check'

                ]);
                return response()->json('Check Request Added Successfully.', 200);

            }else
            {
                return response()->json('Invalide package ID',404);
            }

        }
        else
        {
            return response()->json('Information Required');
        }
    }

    public function AddTurnOnToPackage(Request $request)
    {
        if($request->notes != "" && $request->package_id != "")
        {
            $flag =0;

            $user = Auth::guard('user-api')->user();
            foreach($user->package as $p)
            {
                if($p->sended == 1)
                {
                    if($p->id == $request->package_id){
                    $flag =1;
                    }
                }
            }
            if($flag == 1)
            {
                PackageNote::create([
                    'user_id'=> $user->id,
                    'package_id' => $request->package_id,
                    'notes' =>$request->notes,
                    'type' => 'TurnOn'

                ]);
                return response()->json('Turning On Request Added Successfully.', 200);

            }else
            {
                return response()->json('Invalide package ID',404);
            }

        }
        else
        {
            return response()->json('Information Required');
        }
    }

    public function returnPhotoRange()
    {
        $user = Auth::guard('user-api')->user();
        $res = ImageVideoService::where('service_for', 'Image')->get();
        foreach($res as $r)
        {
            if($r->subscriberPackageName->name == $user->mem_package){
                $data['id'] = $r->id;
                $data['service_for'] = $r->service_for;
                $data['service_type'] = $r->service_type;
                $data['from'] = $r->from;
                $data['to'] = $r->to;
                $data['price'] = $r->price;
                return response()->json($data, 200);
            }
        }
        
    }

    public function returnVideoRange()
    {
        $user = Auth::guard('user-api')->user();
        $res = ImageVideoService::where('service_for', 'Video')->get();
        foreach($res as $r)
        {
            if($r->subscriberPackageName->name == $user->mem_package){
                $data['id'] = $r->id;
                $data['service_for'] = $r->service_for;
                $data['service_type'] = $r->service_type;
                $data['from'] = $r->from;
                $data['to'] = $r->to;
                $data['price'] = $r->price;
                return response()->json($data, 200);
            }
        }
        
    }




}
