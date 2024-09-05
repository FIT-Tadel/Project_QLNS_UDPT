package com.example.demo.controller;

import com.example.demo.service.StravaApiService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import java.util.List;
import java.util.Map;

@Controller
//@RestController
@RequestMapping("/api/activities")
public class StravaActivityController {

    private final StravaApiService stravaApiService;

    @Autowired
    public StravaActivityController(StravaApiService stravaApiService) {
        this.stravaApiService = stravaApiService;
    }

    @GetMapping("/{userId}")
    public String getActivities(@PathVariable String userId, Model model) {
        List<Map<String, Object>> activities = stravaApiService.getActivitiesForUser(userId);
        System.out.println("Activities: " + activities);  // Debug log
        model.addAttribute("activities", activities);
        return "activities";
    }
    
    @GetMapping("/test")
    @ResponseBody
    public String testEndpoint() {
        return "Controller is working!";
    }
}