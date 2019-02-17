<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;




class ApplicationsDatatablesController extends Controller
{
    public function getDivisionalDistrictIds(){
        $id_objects = DB::table('districts')->select('id')->where('isDivision',1)->get();
        $divisional_district_ids = [];
        $index = 0;
        foreach ($id_objects as $id_object){
            $divisional_district_ids[$index++] = $id_object->id;
        }
        return $divisional_district_ids;

    }

    public function getAllApplicationsData(){

        if(auth()->user()->role == 'admin'){

            $applications = DB::table('users')
                ->join('applications','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                     'applications.created_at')
                ->where('applications.district_id', auth()->user()->district_id);

        }

        else{
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at' )
                ->where('applications.user_id', auth()->user()->id);
        }

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('status', function ($application){
                if($application->status == 'Approved') return '<p style="color: green;">Approved</p>';
                elseif($application->status == 'Rejected') return '<p style="color: red;">Rejected</p>';
                else  return '<p style="color: grey;">Unapproved</p>';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);

    }

    public function getAllUnapprovedApplicationsData(){
        if(auth()->user()->role == 'admin'){
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at', 'applications.updated_at')
                ->where('applications.status', 'Unapproved')
                ->where('applications.district_id', auth()->user()->district_id);

        }

        else{
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at', 'applications.updated_at')
                ->where('applications.status', 'Unapproved')
                ->where('applications.user_id', auth()->user()->id);
        }

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);

    }

    public function getAllApprovedApplicationsData(){
        if(auth()->user()->role == 'admin'){
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at', 'applications.updated_at')
                ->where('applications.status', 'Approved')
                ->where('applications.district_id', auth()->user()->district_id);

        }

        else{
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at', 'applications.updated_at')
                ->where('applications.status', 'Approved')
                ->where('applications.user_id', auth()->user()->id);
        }

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);

    }

    public function getAllRejectedApplicationsData(){
        if(auth()->user()->role == 'admin'){
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at', 'applications.updated_at')
                ->where('applications.status', 'Rejected')
                ->where('applications.district_id', auth()->user()->district_id);

        }

        else{
            $applications = DB::table('applications')
                ->join('users','applications.user_id', '=', 'users.id')
                ->select('applications.id','applications.district_id','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                    'applications.created_at', 'applications.updated_at')
                ->where('applications.status', 'Rejected')
                ->where('applications.user_id', auth()->user()->id);
        }

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);

    }





//    DIVISIONAL APPLICATIONS
    public function getAllDivisionalApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->whereIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('status', function ($application){
                if($application->status == 'Approved') return '<p style="color: green;">Approved</p>';
                elseif($application->status == 'Rejected') return '<p style="color: red;">Rejected</p>';
                else  return '<p style="color: grey;">Unapproved</p>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getAllNonDivisionalApplicationsData(){
        $divisional_district_ids = $this->getDivisionalDistrictIds();

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->whereNotIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('status', function ($application){
                if($application->status == 'Approved') return '<p style="color: green;">Approved</p>';
                elseif($application->status == 'Rejected') return '<p style="color: red;">Rejected</p>';
                else  return '<p style="color: grey;">Unapproved</p>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getAllDivisionalUnapprovedApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->where('applications.status', 'Unapproved')
            ->whereIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getAllNonDivisionalUnapprovedApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->where('applications.status', 'Unapproved')
            ->whereNotIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }



    public function getAllDivisionalApprovedApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->where('applications.status', 'Approved')
            ->whereIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getAllNonDivisionalApprovedApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->where('applications.status', 'Approved')
            ->whereNotIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getAllDivisionalRejectedApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->where('applications.status', 'Rejected')
            ->whereIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getAllNonDivisionalRejectedApplicationsData(){

        $applications = DB::table('applications')
            ->join('users','applications.user_id', '=', 'users.id')
            ->join('districts', 'applications.district_id', '=', 'districts.id')
            ->select('applications.id','districts.name as district_name','applications.festival_name','applications.festival_type','users.name','users.organization_name','applications.status',
                'applications.created_at', 'applications.updated_at')
            ->where('applications.status', 'Rejected')
            ->whereNotIn('applications.district_id', $this->getDivisionalDistrictIds());

        return DataTables::of($applications)
            ->addColumn('action', function ($application) {
                return '<a href="/applications/'.$application->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>';
            })
            ->editColumn('created_at', function ($application) {
                return $application->created_at ? with(new Carbon($application->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($application) {
                return $application->updated_at ? with(new Carbon($application->updated_at))->format('m/d/Y') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }
}
