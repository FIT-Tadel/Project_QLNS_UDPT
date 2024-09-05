package com.example.demo.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.example.demo.model.user_point;
import com.example.demo.model.voucher;
import com.example.demo.repository.user_pointRepo;

import java.util.List;

@Service
public class serviceforredeem {
	@Autowired
    private user_pointRepo userRepository;
	
	@Transactional
	public String redeemVoucher(String username, voucher voucher) {
		user_point user = userRepository.findByUsername(username);
        if (user == null) {
            return "User not found";
        }

        if (user.getPoints() >= voucher.getCost()) {
            user.setPoints(user.getPoints() - voucher.getCost());
            user.getVouchers().add(voucher.getTenVC());
            userRepository.save(user);
            return "Voucher added successfully";
        } else {
            return "Not enough points";
        }
    }

    //Get user vouchers
    @Transactional
    public List<String> getUserVouchers(String username) {
        user_point user = userRepository.findByUsername(username);
        if (user == null) {
            return null;
        }
        List<String> userVouchers = user.getVouchers();
        userVouchers.forEach(System.out::println);
        return userVouchers;
    }

}
