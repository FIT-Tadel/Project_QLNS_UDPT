package com.example.demo.repository;
import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.demo.model.voucher;

public interface voucherRepository extends JpaRepository<voucher, Integer>{
	Optional<voucher> findById(Integer id);

	//List All Voucher
	@Query("SELECT v FROM voucher v")
	List<voucher> findAll();

	@Query("SELECT v FROM voucher v WHERE v.maVC IN :maVC")
	List<voucher> findByMaVC(List<String> maVC);

}
