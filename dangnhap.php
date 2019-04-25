<?php
	require 'conn.php';
	session_start();
	if(isset($_SESSION["ID"])){
		if($_SESSION["MaVaiTro"]=="ADMIN"){
			header('location:./kppsshop_admin_home.php');
		}
		else if($_SESSION["MaVaiTro"]=="KHACHHANG"){
			header('location:./kppsshop_trangchu.php');
		}
	}
	else{
	if (isset($_POST["btndangnhap"])){
		$tendangnhap=$_POST["tendangnhap"];
		$password=$_POST["password"];
		$sql_kiemtradangnhap="select taikhoan.ID as ID,taikhoan.TenDN as TenDN,taikhoan.Password as Password,khachhang.MaVaiTro as MaVaiTro from taikhoan,khachhang where taikhoan.ID=khachhang.MaKH and TenDN='$tendangnhap' and Password='$password'";
		$excute_sql_kiemtradangnhap=mysqli_query($connect,$sql_kiemtradangnhap);
		if (is_null($kiemtradangnhap=mysqli_num_rows($excute_sql_kiemtradangnhap))==false){
			$kq_kiemtradangnhap=mysqli_fetch_array($excute_sql_kiemtradangnhap);
			$_SESSION["ID"]=$kq_kiemtradangnhap["ID"];
			$_SESSION["MaVaiTro"]=$kq_kiemtradangnhap["MaVaiTro"];
			if($_SESSION["MaVaiTro"]=="ADMIN"){
				header('location:./kppsshop_admin_danhsachdonhang.php?tinhtrang=chuaxuly');
			}
			else if($_SESSION["MaVaiTro"]=="KHACHHANG"){
				header('location:./kppsshop_trangchu.php');
			}
		}
	}
	}
?>