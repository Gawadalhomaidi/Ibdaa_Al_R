<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('erp.account_activation') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-container {
            width: 100%;
            max-width: 440px;
        }
        
        .auth-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px 30px;
            text-align: center;
            color: white;
        }
        
        .logo-container {
            margin-bottom: 20px;
        }
        
        .logo-image {
            height: 60px;
            width: auto;
        }
        
        .auth-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
        }
        
        .auth-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .auth-subtitle {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .auth-form {
            padding: 30px;
        }
        
        .user-greeting {
            text-align: center;
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .verification-code-container {
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }
        
        .verification-code {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 8px;
            color: #2d3748;
            font-family: 'Courier New', monospace;
        }
        
        .code-expiry {
            text-align: center;
            color: #e53e3e;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .instructions {
            background: #ebf8ff;
            border: 1px solid #bee3f8;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .instructions-title {
            color: #2b6cb0;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .instructions-list {
            text-align: right;
            padding-right: 20px;
            color: #4a5568;
        }
        
        .instructions-list li {
            margin-bottom: 8px;
        }
        
        .warning-message {
            text-align: center;
            color: #718096;
            font-size: 14px;
            margin-top: 20px;
            padding: 15px;
            background: #f7fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        
        .auth-footer {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 14px;
        }
        
        .footer-links {
            margin-top: 10px;
        }
        
        .footer-link {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
        }
        
        @media (max-width: 480px) {
            .auth-container {
                padding: 10px;
            }
            
            .auth-header {
                padding: 30px 20px 20px;
            }
            
            .auth-form {
                padding: 20px;
            }
            
            .verification-code {
                font-size: 28px;
                letter-spacing: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="logo-container">
                    <img src="./ebdaa.png" alt="ابداع الريادة" class="logo-image">
                </div>
                <div class="auth-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h1 class="auth-title">{{ __('erp.account_activation') }}</h1>
                <p class="auth-subtitle">{{ __('erp.enter_verification_code') }}</p>
            </div>
            
            <div class="auth-form">
                <div class="user-greeting">
                    مرحباً {{ $user->first_name }} {{ $user->last_name }}!
                </div>
                
                <p style="text-align: center; color: #4a5568; margin-bottom: 20px;">
                    شكراً لتسجيلك في نظام ابداع الريادة. لتفعيل حسابك، يرجى استخدام كود التحقق التالي:
                </p>
                
                <div class="verification-code-container">
                    <div class="verification-code">
                        {{ $verificationCode }}
                    </div>
                </div>
                
                <div class="code-expiry">
                    ⏰ هذا الكود صالح لمدة 30 دقيقة فقط
                </div>
                
                <div class="instructions">
                    <div class="instructions-title">📋 تعليمات التفعيل:</div>
                    <ol class="instructions-list">
                        <li>ارجع إلى صفحة التفعيل في النظام</li>
                        <li>أدخل كود التحقق أعلاه</li>
                        <li>انقر على زر "تفعيل الحساب"</li>
                    </ol>
                </div>
                
                <div class="warning-message">
                    ⚠️ إذا لم تطلب هذا الكود، يرجى تجاهل هذه الرسالة.
                </div>
            </div>
            
            <div class="auth-footer">
                <p>© {{ date('Y') }} نظام ابداع الريادة. جميع الحقوق محفوظة.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">الخصوصية</a>
                    <a href="#" class="footer-link">الشروط</a>
                    <a href="#" class="footer-link">الدعم</a>
                </div>
                <p style="margin-top: 10px; font-size: 12px; color: #a0aec0;">
                    هذه رسالة تلقائية، يرجى عدم الرد على هذا البريد
                </p>
            </div>
        </div>
    </div>
</body>
</html>