package com.example.demo.repository;

import com.example.demo.entity.StravaUser;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface StravaUserRepository extends MongoRepository<StravaUser, String> {
}