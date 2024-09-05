package com.example.demo.service;

import com.example.demo.entity.StravaUser;
import com.example.demo.repository.StravaUserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;

import java.util.List;
import java.util.Map;

@Service
public class StravaApiService {

    private final StravaUserRepository stravaUserRepository;
    private final RestTemplate restTemplate;

    @Autowired
    public StravaApiService(StravaUserRepository stravaUserRepository, RestTemplate restTemplate) {
        this.stravaUserRepository = stravaUserRepository;
        this.restTemplate = restTemplate;
    }

    public List<Map<String, Object>> getActivitiesForUser(String userId) {
        StravaUser user = stravaUserRepository.findById(userId)
                .orElseThrow(() -> new RuntimeException("User not found"));

        String accessToken = getAccessToken(user);
        String activitiesUrl = "https://www.strava.com/api/v3/athlete/activities?access_token=" + accessToken;

        return restTemplate.getForObject(activitiesUrl, List.class);
    }

    private String getAccessToken(StravaUser user) {
        String tokenUrl = "https://www.strava.com/oauth/token";
        Map<String, String> params = Map.of(
            "client_id", user.getClientId(),
            "client_secret", user.getClientSecret(),
            "refresh_token", user.getRefreshToken(),
            "grant_type", "refresh_token"
        );

        Map<String, Object> response = restTemplate.postForObject(tokenUrl, params, Map.class);
        return (String) response.get("access_token");
    }
}