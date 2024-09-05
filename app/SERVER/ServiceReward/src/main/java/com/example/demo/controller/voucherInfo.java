package com.example.demo.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

import com.example.demo.model.voucher;
import com.example.demo.repository.voucherRepository;

@RestController 
@RequestMapping("/api/voucher")
public class voucherInfo {
	@Autowired
	voucherRepository voucherRepo;

	@Autowired
    private serviceforredeem userService;
	
	//add new voucher
	@PostMapping("/addvoucher")
	public ResponseEntity<voucher> ThemVoucher(@RequestBody voucher Voucher){
		try {
			voucher _Voucher = voucherRepo.save(new voucher(Voucher.getMaVC(), Voucher.getTenVC(), Voucher.getCost()));
			return new ResponseEntity<>(_Voucher, HttpStatus.CREATED);
		}catch (Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	 @GetMapping("/listall")
     public ResponseEntity<List<voucher>> viewVoucherList() {
		 List<voucher> vouchers = voucherRepo.findAll();
		 if (vouchers.isEmpty()) {
			 return new ResponseEntity<>(HttpStatus.NO_CONTENT);
		 }
		 return new ResponseEntity<>(vouchers, HttpStatus.OK);
     }

	 @GetMapping("/myvoucher/{username}")
	 public ResponseEntity<List<voucher>> viewMyVoucher(@PathVariable("username") String username) {
		List<String> my_vouchers = userService.getUserVouchers(username);
		if (my_vouchers == null) {
			return new ResponseEntity<>(HttpStatus.NO_CONTENT);
		}
		return new ResponseEntity<>(voucherRepo.findByMaVC(my_vouchers), HttpStatus.OK);
	 }

	 @PostMapping("/redeem-voucher")
	 public ResponseEntity<String> redeemVoucher(@RequestParam String username,@RequestBody voucher voucher) {
	        String result = userService.redeemVoucher(username, voucher);
	        if (result.equals("Voucher added successfully")) {
	            return ResponseEntity.ok(result);
	        } else {
	            return ResponseEntity.badRequest().body(result);
	        }
	    }
	   
	 
	
	
}
