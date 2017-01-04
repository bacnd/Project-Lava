<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPExcel; 
use PHPExcel_IOFactory; 
use PHPExcel_Cell;
use App\NhanVien;
use App\Luong;

class LuongController extends Controller
{
    public function index(Request $request) {

        $luong = new Luong;

        if(empty($request['Nam']) && empty($request['Thang'])) {
            $request['Nam'] = date("Y");
            $request['Thang'] = date("m");
        }

        $monthSearch = $request['Thang'];
        $yearSearch = $request['Nam'];

        $showluong = Luong::where('ngay', 'like', $yearSearch.'-'.$monthSearch.'%')->get();

        $nhanvien = new NhanVien;

    	return view('luong.index', compact('luong', 'showluong', 'nhanvien', 'monthSearch', 'yearSearch'));

    }

    public function upload(Request $request) {

        $checkLuong = Luong::where('ngay', 'like', $request['ChamCongNam'].'-'.$request['ChamCongThang'].'%');

        $ngay = $request['ChamCongNam'].'-'.$request['ChamCongThang'].'-'.date("d");

    	$filename = $request->file('filechamcong');
        $inputFileType = PHPExcel_IOFactory::identify($filename);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load("$filename");

        $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $arraydata = array();
        $i = 0;
        for ($index = 7; $index < 29; $index+=2) {
            $i++;
            $arraydata[$i]['MNV'] = trim($objWorksheet->getCell('B'.$index)->getCalculatedValue());
            $arraydata[$i]['ngaycong'] = trim($objWorksheet->getCell('AJ'.$index)->getCalculatedValue());
            $arraydata[$i]['tangcathuong'] = trim($objWorksheet->getCell('AK'.$index)->getCalculatedValue());
            $arraydata[$i]['tangcale'] = trim($objWorksheet->getCell('AL'.$index)->getCalculatedValue());
            $arraydata[$i]['tangcacn'] = trim($objWorksheet->getCell('AM'.$index)->getCalculatedValue());
        }

        $i = 0;
        $luongNV = array();
        foreach ($arraydata as $tinhluong) {
            $nhanvien = new NhanVien;
            $luongcoban = $nhanvien::find($tinhluong['MNV'])->luongcoban;
            $trocap = $nhanvien::find($tinhluong['MNV'])->trocap;
            $tongluong = $luongcoban + $trocap;
            $luongbinhquanngay = $tongluong/26;
            $ngaycong = $tinhluong['ngaycong'];
            if(26 - $ngaycong < 1) $ngaynghi = 0;
            else $ngaynghi = 26 - $ngaycong;
            $ngayphep = $nhanvien::find($tinhluong['MNV'])->nghiphep;
            $ngayconghuongluon = $ngaycong - $ngaynghi + $ngayphep;
            $tangcathuong = trim($tinhluong['tangcathuong'] * $luongbinhquanngay * 150/100);
            $tangcale = trim($tinhluong['tangcale'] * $luongbinhquanngay * 200/100);
            $tangcacn = trim($tinhluong['tangcacn'] * $luongbinhquanngay * 400/100);
            $luongthucnhan = trim(round($luongbinhquanngay*$ngayconghuongluon + $tangcathuong + $tangcale + $tangcacn));

            $i++;
            $luongNV[$i] = array( 
                'manv' => $tinhluong['MNV'],
                'ngay' => $ngay,
                'luongcoban' => LuongController::adddotstring($luongcoban),
                'trocap' => LuongController::adddotstring($trocap),
                'ngaycong' => $ngaycong,
                'ngayphep' => $ngayphep,
                'ngaynghi' => trim($ngaynghi),
                'tangcathuong' => $tangcathuong,
                'tangcacn' => $tangcacn,
                'tangcale' => $tangcale,
                'luongthucnhan' => LuongController::adddotstring($luongthucnhan),
            );
        }

        if(empty($checkLuong->get())) {
            foreach ($luongNV as $luong) {

                Luong::firstOrCreate($luong);
            
            }
        } else {
            $checkLuong->delete();
            foreach ($luongNV as $luong) {

                Luong::firstOrCreate($luong);
                
            }
        }
        
        return redirect(route('luong.home'));
        // return dd($checkLuong);
    }

    public function adddotstring($strNum) {
 
        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result;
    }

    public function view($id) {
        $luong = Luong::find($id);
        $tennhanvien = NhanVien::where('manv', $luong['manv'])->value('hoten');
        return view('luong.view', compact('id','tennhanvien', 'luong'));
    }

    public function edit($id) {
        $luong = Luong::find($id);
        $tennhanvien = NhanVien::where('manv', $luong['manv'])->value('hoten');
        return view('luong.edit', compact('id','tennhanvien', 'luong'));
    }

    public function update($id, Request $request) {
        $luong = Luong::find($id);
        $tennhanvien = NhanVien::where('manv', $luong['manv'])->value('hoten');
        return view('luong.edit', compact('id','tennhanvien', 'luong'));
        
    }

    public function delete($id) {
        Luong::find($id)->delete();
        return redirect(route('luong.home')); 
    }
}
